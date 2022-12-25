<?php


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- my css  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Vue  -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">

                    <!-- titolo -->
                    <div class="text-center mb-3">
                        <h1>To Do List</h1>
                    </div>

                    <!-- aggiungi nuova task  -->
                    <form action="" class="d-flex mb-3" @submit.prevent="taskSubmit()">
                        <input v-model="newTask.text" class="form-control" type="text" class="flex-grow-1" placeholder="new task">
                        <button class="btn btn-primary flex-shrink-0" >Add task</button>
                    </form>

                    <!-- lista delle task -->
                    <div class="d-flex flex-column gap-1">
                        <div class="task" v-for="(task,i) in toDoList" :style="{'order':-i}">
                            <div class="flex-grow-1 box-task" @click="onTaskClick(i)">
                                <i class="fa-regular " :class="{'fa-circle' : !task.done,'fa-circle-check':task.done }"></i>
                            
                                <div class="ms-2 message" :class="{'text-decoration-line-through': task.done}">{{task.message}}</div>
                                <div class="date">Creato:{{task.createdAt}}</div>
                            </div>
                            <div class="px-3 btn-delete" @click="onDeleteTask(i)">
                                <i class="fa-solid fa-trash"></i>
                            </div>

                        </div>
                       
                    </div>


                </div>
            </div>

        </div>


    </div>



    <script type="module" src="js/todo.js"></script>
</body>

</html>