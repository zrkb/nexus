//
// choices.js
// Theme module
//

import Choices from 'choices.js';

const toggles = document.querySelectorAll('[data-choices]');

function debounce(fn, ms) {
  let t;
  return (...args) => {
    clearTimeout(t);
    t = setTimeout(() => fn(...args), ms);
  };
}

toggles.forEach((toggle) => {
  const elementOptions = toggle.dataset.choices ? JSON.parse(toggle.dataset.choices) : {};

  const defaultOptions = {
    classNames: {
      containerInner: 'form-select', // Fixed: single class only
      input: 'form-control',
      inputCloned: 'form-control-sm',
      listDropdown: 'dropdown-menu',
      itemChoice: 'dropdown-item',
      activeState: 'show',
      selectedState: 'active',
    },
    shouldSort: false,
    allowHTML: true,
    renderChoiceLimit: -1,
    callbackOnCreateTemplates: function (template) {
      return {
        choice: ({ classNames }, data) => {
          const classes = `${classNames.item} ${classNames.itemChoice} ${data.disabled ? classNames.itemDisabled : classNames.itemSelectable}`;
          const disabled = data.disabled ? 'data-choice-disabled aria-disabled="true"' : 'data-choice-selectable';
          const role = data.groupId > 0 ? 'role="treeitem"' : 'role="option"';
          const selectText = this.config.itemSelectText;

          const label =
            data.customProperties && data.customProperties.avatarSrc
              ? `
            <div class="avatar avatar-xs me-3">
              <img class="avatar-img rounded-circle" src="${data.customProperties.avatarSrc}" alt="${data.label}" >
            </div> ${data.label}
          `
              : data.label;

          return template(`
            <div class="${classes}" data-select-text="${selectText}" data-choice ${disabled} data-id="${data.id}" data-value="${data.value}" ${role}>
              ${label}
            </div>
          `);
        },
      };
    },
  };

  const options = { ...defaultOptions, ...elementOptions };

  const choices = new Choices(toggle, options);

  const url = toggle.dataset.choicesAjaxUrl;
  if (!url) return;

  const minChars   = parseInt(toggle.dataset.choicesMin || '2', 10);
  const queryParam = toggle.dataset.choicesParam || toggle.dataset.choicesAjaxParam || 'q';
  const limit      = parseInt(toggle.dataset.choicesLimit || '20', 10);

  choices.config.searchEnabled = true;
  choices.config.searchChoices = false;

  let controller = null;
  let lastQuery = '';

  function getMeta(name) {
    return document.querySelector(`meta[name="${name}"]`)?.getAttribute('content') ?? '';
  }

  const fetchResults = async (query) => {
    if (controller) controller.abort();
    controller = new AbortController();

    const csrf = getMeta('csrf-token');
    const params = new URLSearchParams({ [queryParam]: query, limit: String(limit) });
    const resp = await fetch(`${url}?${params.toString()}`, {
      headers: {
        'Accept':'application/json',
        'X-Requested-With':'XMLHttpRequest',
        'X-CSRF-TOKEN': csrf
      },
      signal: controller.signal,
    });

    if (!resp.ok) throw new Error(`HTTP ${resp.status}`);
    return resp.json();
  };

  const onSearch = debounce(async (event) => {
    const q = (event.detail?.value || '').trim();
    if (q.length < minChars || q === lastQuery) return;
    lastQuery = q;

    choices.clearChoices();
    choices.setChoices(
      [{ value: '__loading__', label: 'Buscando…', disabled: true }],
      'value',
      'label',
      true
    );

    try {
      const selectedValues = choices.getValue(true);
      const selected = new Set(
        Array.isArray(selectedValues)
          ? selectedValues.map(String)
          : selectedValues ? [String(selectedValues)] : []
      );

      const data = await fetchResults(q);
      const items = data.filter((d) => !selected.has(String(d.value)));

      choices.clearChoices();
      choices.setChoices(items, 'value', 'label', true);
    } catch (e) {
      if (e.name === 'AbortError') return;
      console.error('Search error:', e);
      choices.clearChoices();
      choices.setChoices(
        [{ value: '__error__', label: 'Error buscando resultados', disabled: true }],
        'value',
        'label',
        true
      );
    }
  }, 250);

  choices.passedElement.element.addEventListener('search', onSearch);

  choices.passedElement.element.addEventListener('showDropdown', () => {
    if (!lastQuery) {
      choices.clearChoices();
      choices.setChoices(
        [{ value: '__hint__', label: `Escribí al menos ${minChars} letras…`, disabled: true }],
        'value',
        'label',
        true
      );
    }
  });
});

window.Choices = Choices;
