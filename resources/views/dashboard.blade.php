<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-auto rounded-lg shadow">
                <!-- bg-white  -->
                <section class="vh-100">
                    <div class="container mx-auto sm:px-4 py-2 h-80">
                        <div class="flex flex-wrap justify-center items-center h-full">
                            <div class="relative flex-grow max-w-full flex-1 px-4">
                                @if(session()->has('pop'))
                                @if(session()->get('pop') == 'added' )
                                <div id="added" class="flex justify-between p-4 mb-4 text-sm text-yellow-500 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" role="alert">
                                    <span class="font-medium">Todo added succesfully</span>
                                    <span class="font-medium"><button onclick="hide('added')">x</button></span>
                                </div>
                                @elseif(session()->get('pop') == 'updated')
                                <div id="updated" class="flex justify-between p-4 mb-4 text-sm text-blue-600 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                                    <span class="font-medium">Todo updated succesfully</span>
                                    <span class="font-medium"><button onclick="hide('updated')">x</button></span>
                                </div>
                                @elseif(session()->get('pop') == 'deleted')
                                <div id="deleted" class="flex justify-between p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                    <span class="font-medium">Todo deleted successfully</span>
                                    <span class="font-medium"><button onclick="hide('deleted')">x</button></span>
                                </div>
                                @elseif(session()->get('pop') == 'done' )
                                <div id="done" class="flex justify-between p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                    <span class="font-medium">Congratulations you completed the task!</span>
                                    <span class="font-medium"><button onclick="hide('done')">x</button></span>
                                </div>
                                @elseif(session()->get('pop') == 'undone' )
                                <div id="undone" class="flex justify-between p-4 mb-4 text-sm text-orange-700 bg-orange-100 rounded-lg dark:bg-orange-200 dark:text-orange-800" role="alert">
                                    <span class="font-medium">The task is undone!</span>
                                    <span class="font-medium"><button onclick="hide('undone')">x</button></span>
                                </div>
                                @endif
                                @endif
                                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300" id="list1" style=" background-color: #eff1f2;">
                                    <!-- border-radius: .75rem;     -->
                                    <div class="overflow-auto rounded-lg shadow flex-auto p-6 py-4 px-4 md:px-12">
                                        <p class="h1 text-center mt-3 mb-4 pb-3 text-blue-600">
                                            <i class="fas fa-check-square me-1">My Todo-s</i>
                                        </p>
                                        <hr class="my-6">
                                        <table id="todos" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        Task
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        Description
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span class="flex items-center">
                                                            <p class="hover:cursor-pointer divide-x-2" onclick="showselect()">Completed</p>
                                                            <select onchange="filter()" id="filter" style="display: none;" class="text-xs text-gray-900 bg-gray-50 border-none focus:ring-0 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white ">
                                                                <option selected value="all">All</option>
                                                                <option value="done">✅</option>
                                                                <option value="undone">❌</option>
                                                            </select>
                                                        </span>

                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($datas as $data)
                                                <tr class="bg-gray-700 border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                        {{$data->task}}
                                                    </th>
                                                    <td class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white break-words">
                                                        {{$data->description}}
                                                    </td>
                                                    @if($data->is_done == 1)
                                                    <td headers="done" class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                        ✅
                                                    </td>
                                                    <td class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">

                                                        <form action="{{route('todos_done',['id'=>$data->id,'state'=>1])}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="text-white bg-orange-600 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-1 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">Undone</button>
                                                        </form>
                                                        <form action="{{route('todos_edit',$data->id)}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                                                        </form>
                                                        <form action="{{route('todos_delete',$data->id)}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</button>
                                                        </form>

                                                    </td>
                                                    @else
                                                    <td headers="undone" class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                        ❌
                                                    </td>
                                                    <td class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">

                                                        <form action="{{route('todos_done',['id'=>$data->id,'state'=>0])}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-1 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Done</button>
                                                        </form>
                                                        <form action="{{route('todos_edit',$data->id)}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                                                        </form>
                                                        <form action="{{route('todos_delete',$data->id)}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</button>
                                                        </form>

                                                    </td>
                                                    @endif

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        function hide(id) {
            var element = document.getElementById(id);
            element.remove();
        }

        function showselect() {
            var element = document.getElementById("filter");
            element.style.display = "";
        }

        function filter() {
            var element = document.getElementById("filter");
            element.style.display = "none";
            var selected = element.selectedIndex;
            var table, tr, td;
            table = document.getElementById("todos");
            tr = table.getElementsByTagName("tr");
            switch (selected) {
                case 0:
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];
                        if (td) {
                            tr[i].style.display = "";
                        }
                    }
                    break;

                case 1:
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];
                        if (td) {
                            if (td.headers == "done") {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                    break;

                case 2:
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName('td')[1];
                        if (td) {
                            if (td.headers == 'undone') {
                                tr[i].style.display = '';
                            } else {
                                tr[i].style.display = 'none';
                            }
                        }
                    }
                    break;
            }
        }
    </script>

</x-app-layout>