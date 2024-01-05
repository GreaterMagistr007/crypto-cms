<x-admin-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if ($isCodeSended)
            @dump('Код отправлялся')

            <div>
                <x-input-label for="email" :value="__('Enter code')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Send code') }}
                </x-primary-button>
            </div>

            @if ($minutesAfterLastSendCode > 0)
                <script>
                    console.log('$minutesAfterLastSendCode: ' + {!! $minutesAfterLastSendCode !!});
                </script>
            @endif

        @else
{{--            @dump('Код НЕ отправлялся')--}}
            <div>
                <x-input-label :value="__('The code will be sent to the chat')" />
            </div>
        <br>
            <x-danger-button id="sendCodeButton" class="ms-3">
                {{ __('Send code') }}
            </x-danger-button>

            <script>
                document.querySelector('#sendCodeButton').addEventListener('click', function(e) {
                    e.preventDefault();

                    let url = '{!! route('patch__admin_send-auth-code') !!}';
                    let requestOptions = {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': getCsrfToken()
                        },
                    };

                    fetch(url, requestOptions)
                        .then(response => {
                            console.log('response: ', response);
                        });
                })

            </script>
        @endif
    </form>
</x-admin-layout>
