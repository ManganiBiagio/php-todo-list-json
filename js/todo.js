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
        taskClicked.done=!taskClicked.done;
       
        
    },
    onDeleteTask(iDeleteTask){
        this.toDoList.splice(iDeleteTask,1);
        

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


            if(toDoListRow.length>0){

                toDoListRow.forEach(element => {
                    if(element.done==="true"){
                       this.toDoList.push(new ToDoItem(element.message,true)) ;
    
                    }
                    else{
                        this.toDoList.push(new ToDoItem(element.message,false));
                    }
                    
                    
                });
            }
        })

    }

  },
  mounted(){
    this.fetchTasks();
    
    
  }
}).mount("#app")