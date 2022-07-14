<x-app-layout>
    <div>
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <section class="vh-100">
                    @if(session()->has('err'))
                    <div id="err" class="flex justify-between p-4 mb-4 text-sm text-red-500 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{session()->get('err')}}</span>
                        <span class="font-medium"><button onclick="hide('err')">x</button></span>
                    </div>
                    @endif
                    <label for="editormodify" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Edit or modify</label>
                    <select onchange="show()" id="editormodify" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected hidden default>Edit/Modify</option>
                        <option value="US">Edit</option>>
                        <option value="US">Modify</option>>
                    </select>
                    <form method="POST" action="{{route('todos_update',$id)}}">
                        @csrf
                        <div class="flex-col items-center justify-center">
                            <div class="py-3">
                                <label for="task" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Task</label>
                                <input type="text" name="task" id="task" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave empty not to edit">
                            </div>
                            <div class="py-3">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Description</label>
                                <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave empty not to edit"></textarea>
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script>
        function show() {
            var element = document.getElementById('editormodify');
            var selected = element.selectedIndex;
            var task = document.getElementById("task");
            var description = document.getElementById("description");
            switch (selected) {
                case 1:
                    task.value = "";
                    description.textContent = "";
                    description.innerText = "";
                    break;
                case 2:
                    task.value = "<?php echo $datas->task; ?>";
                    description.textContent = "<?php echo $datas->description ?>";
                    description.innerText = "<?php echo $datas->description ?>";
                    break;

            }


        }

        function hide(id) {
            var element = document.getElementById(id);
            element.remove();
        }
    </script>
</x-app-layout>