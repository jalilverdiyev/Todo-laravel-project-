<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-auto rounded-lg shadow">
                <!-- bg-white  -->
                <section class="vh-100">
                    <div class="container mx-auto sm:px-4 py-2 h-80">
                        <div class="flex flex-wrap justify-center items-center h-full">
                            <div class="relative flex-grow max-w-full flex-1 px-4">
                                <div class="flex justify-between p-4 mb-4 text-sm text-yellow-500 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" role="alert">
                                    <span class="font-medium">Todo added succesfully</span>
                                    <span><button>x</button></span>
                                </div>
                                <div class="p-4 mb-4 text-sm text-blue-600 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                                    <span class="font-medium">Todo updated succesfully</span>
                                </div>
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                    <span class="font-medium">Todo deleted successfully</span>
                                </div>
                                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                    <span class="font-medium">Congratulations you completed the task!</span>
                                </div>
                                <div class="p-4 mb-4 text-sm text-orange-700 bg-orange-100 rounded-lg dark:bg-orange-200 dark:text-orange-800" role="alert">
                                    <span class="font-medium">The task is undone!</span>
                                </div>
                                <br>
                                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300" id="list1" style=" background-color: #eff1f2;">
                                    <!-- border-radius: .75rem;     -->
                                    <div class="overflow-auto rounded-lg shadow flex-auto p-6 py-4 px-4 md:px-12">
                                        <p class="h1 text-center mt-3 mb-4 pb-3 text-blue-600">
                                            <i class="fas fa-check-square me-1">My Todo-s</i>
                                        </p>
                                        <hr class="my-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>