import Tagify from '@yaireo/tagify';


// bootstrap-tagsinput
const element = document.querySelector('[data-role="tagsinput"]');

const tagify = new Tagify(element, {
    originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
});
