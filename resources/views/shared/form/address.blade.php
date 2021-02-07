<div class="col-md-12">
@include('shared.form.text_input', [
    'slug' => $parentSlug . 'address_1',
    'label' => 'Address 1',
    'value' => $parentObj->address_1 ?? old($parentSlug . 'address_1'),
    'errors' => $errors->get($parentSlug . 'address_1')
])
</div>
<div class="col-md-12">
@include('shared.form.text_input', [
    'slug' => $parentSlug . 'address_2',
    'label' => 'Address 2',
    'value' => $parentObj->address_2 ?? old($parentSlug . 'address_2'),
    'errors' => $errors->get($parentSlug . 'address_2')
])
</div>
<div class="col-md-6">
@include('shared.form.text_input', [
    'slug' => $parentSlug . 'city',
    'label' => 'City',
    'value' => $parentObj->city ?? old($parentSlug . 'city'),
    'errors' => $errors->get($parentSlug . 'city')
])
</div>
<div class="col-md-2">
@include('shared.form.select_input', [
    'slug' => $parentSlug . 'state',
    'label' => 'State',
    'value' => $parentObj->state ?? old($parentSlug . 'state'),
    'options' => \App\Models\Address::STATES,
    'errors' => $errors->get('state')
])
</div>
<div class="col-md-4">
@include('shared.form.text_input', [
    'slug' => $parentSlug . 'zip',
    'label' => 'Zip',
    'value' => $parentObj->zip ?? old($parentSlug . 'zip'),
    'errors' => $errors->get($parentSlug . 'zip')
])
</div>