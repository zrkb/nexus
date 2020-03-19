<div class="avatar {{ isset($size) ? (strlen($size) ? "avatar-{$size}" : '') : 'avatar-sm' }} d-inline-block">
    <img src="{{ $media->getUrl() }}" alt="{{ $media->basename }}" class="avatar-img rounded-circle">
</div>
