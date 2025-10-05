import { ref } from 'vue';
import { route } from 'ziggy-js';

const submit = (form:any)=>{

  const flash = ref(false);
  function submitData(endpoint:string){
       form.post(route(endpoint),{
        onSuccess(){
         form.clearErrors()
         form.reset()
         flash.value = true
         setTimeout(()=>{
           flash.value = false
         }, 3000)
        }
    })
  }

  function HadleImage(e:any){
    form.image= e.target.files[0]
  }

  function HadleMusic (e:any){
    form.music= e.target.files[0]
 }


  return { flash , submitData, HadleImage, HadleMusic}
}

export default submit;