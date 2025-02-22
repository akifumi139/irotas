<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __("Update your account's profile information and email address.") }}
    </p>
  </header>

  <form class="mt-6 space-y-6" method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div>
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name', $user->name)" required
        autofocus autocomplete="name" />
      <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Save') }}</x-primary-button>

      @if (session('status') === 'profile-updated')
        <p class="text-sm text-gray-600" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
          {{ __('Saved.') }}</p>
      @endif
    </div>
  </form>
</section>
