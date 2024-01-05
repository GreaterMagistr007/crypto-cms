<x-admin-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

        @if ($isCodeSended)
{{--            @dump('Код отправлялся')--}}
            <form method="POST" action="{{ route('post__admin_check-auth-code') }}">
                @csrf


                <div>
                    <x-input-label for="code" :value="__('Enter code')" />
                    <x-text-input class="block mt-1 w-full" type="text" name="code" required autofocus autocomplete="username" />
                    @if (isset($error))
                        <x-input-error :messages="$error" class="mt-2" />
                    @endif
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Enter') }}
                    </x-primary-button>
                </div>

                @if ($minutesAfterLastSendCode > 0)
                    <script>
                        console.log('$minutesAfterLastSendCode: ' + {!! $minutesAfterLastSendCode !!});
                    </script>
                @endif
            </form>

        @else
{{--            @dump('Код НЕ отправлялся')--}}
            <div>
                <div>
                    <x-input-label :value="__('Your time in the admin panel has expired')" />
                    <x-input-label :value="__('The code will be sent to the chat')" />
                </div>

                <br>

                <x-href-red-button href="{!! route('get__admin_send-auth-code') !!}" class="ms-3">
                    {{ __('Send code') }}
                </x-href-red-button>
            </div>
        @endif

</x-admin-layout>
