import  {ToDoItem}  from "./classUtilities.js";
const { createApp } = Vue;


createApp({
  
  data () {
    
    return {
        toDoList:[],
        newTask:{
            text:""
        },
        

    };
  },
  methods:{
    onTaskClick(iClickedTask){
        const taskClicked=this.toDoList[iClickedTask];
        

        // const data={
        //     list:[],
        // };
        
        // this.toDoList.forEach((item)=>{
        //     data.list.push({
        //         "message":item.message,
        //         "done":item.done,

        //     }
        //     )
        // })
        axios.post("api/changeDoneTask.php",taskClicked,{
            headers:{'Content-Type': 'multipart/form-data' }
        }).then((resp)=>{
            this.fetchTasks();


        })
       
        
    },
    onDeleteTask(iDeleteTask){
        const taskToDeleted=this.toDoList[iDeleteTask];
        
        
        
        axios.post("api/deleteTask.php",taskToDeleted,{
            headers:{'Content-Type': 'multipart/form-data' }
        }).then((resp)=>{
            this.fetchTasks();


        })
        

    },
    taskSubmit(){
        if(this.newTask.text!==""){
            const newTask=new ToDoItem(this.newTask.text,false);
            this.newTask.text="";
            axios.post("api/addNewTask.php",newTask,{
                headers:{'Content-Type': 'multipart/form-data' }
            }).then((resp)=>{
                this.fetchTasks();


            })

        }else{
            alert("come fai a ricordare una task se non scrivi niente!!")
        }
        
    },
    fetchTasks(){
        axios.get("api/tasksRead.php").then((resp)=>{
            // this.toDoList=resp.data;
            // console.log(resp.data);
            const toDoListRow=resp.data;
            this.toDoList=[];


            if(toDoListRow){

                toDoListRow.forEach(element => {
                    if(element.done==="true"){
                       this.toDoList.push(new ToDoItem(element.message,true,element.id,element.createdAt)) ;
    
                    }
                    else{
                        this.toDoList.push(new ToDoItem(element.message,false,element.id,element.createdAt));
                    }
                    
                    
                });
            }
        })

    },
    

  },
  mounted(){
    this.fetchTasks();
    
    
  }
}).mount("#app")