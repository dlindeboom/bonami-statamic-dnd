<div>
    <div id="signup-modal"
         class="hidden fixed inset-0 z-10 overflow-auto bg-gray-600 bg-opacity-50 flex items-center justify-center">

        <div id="signup-modal-body" class="bg-white rounded-lg shadow-lg mx-4 md:mx-0 my-10 p-4 md:p-8 lg:p-12 lg:w-2/3 w-11/12 ">

            <div class="flex justify-end">
                <button onclick="closeModal()" aria-label="Close" class="text-black hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form method="post" class="w-full" action="{{ route('events.signup', $eventId) }}">
                @method('post')
                {{ csrf_field() }}
                <input type="hidden" name="event_id" value="{{ $eventId }}">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input id="email"
                           placeholder="mail@example.com"
                           value="{{ old('email') }}"
                           type="email" name="email"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input id="name"
                           placeholder="John Doe"
                           value="{{ old('name') }}"
                           type="text" name="name"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="about_you" class="block text-gray-700 text-sm font-bold mb-2">About You:</label>
                    <textarea id="about_you" name="about_you" rows="4"
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              placeholder="Share your experience with D&D (e.g., beginner, some experience, etc.), what you hope to learn, and a bit about yourself.">
                        {{ old('about_you') }}
                    </textarea>
                </div>
                <div class="mb-4">
                    <label for="hide_info" class="inline-flex items-center">
                        <input id="hide_info" checked type="checkbox" name="hide_info"
                               class="form-checkbox h-5 w-5 text-gray-600"
                               title="Selecting this will hide your signup information from public view, and you'll appear as 'Anonymous' in the participants lists. The Dungeon master will still be able to see your info">
                        <span class="ml-2 text-gray-700 text-sm flex items-center"
                              title="Selecting this will hide your signup information from public view, and you'll appear as 'Anonymous' in the participants lists. The Dungeon master will still be able to see your info">
                            Hide info from public
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                    </label>
                </div>

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">
                    Join Now
                </button>
            </form>
        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById('signup-modal').classList.add('hidden');
        }

        document.addEventListener('open-signup', function () {
            document.getElementById('signup-modal').classList.remove('hidden');
        });
    </script>
</div>

