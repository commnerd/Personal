@include('shared.form.address',
    [
        'parentSlug' => $parentSlug,
        'parentObj' => $parentObj,
    ]
)
<div class="col-md-12">
@include('shared.form.text_input', [
    'slug' => $parentSlug . 'phone',
    'label' => 'Phone Number',
    'value' => $parentObj->phone->number ?? old($parentSlug . 'phone'),
    'errors' => $errors->get($parentSlug . 'phone')
])
</div>