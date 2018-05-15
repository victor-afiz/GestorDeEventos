import { Component } from '@angular/core';

@Component({
  selector: 'for-actividades',
  templateUrl: 'for-actividades.html'
})
export class ForActividadesComponent {

  text: string;
  todo : any = "" ;
  actividades:any[] = [
    {"imagen":" https://khms0.googleapis.com/kh?v=798&hl=en-US&x=65412&y=50345&z=17", "actividad":"playa","participantes":"64"},
    {"imagen":" https://khms1.googleapis.com/kh?v=798&hl=es&x=2495&y=3665&z=13", "actividad":"ciclismo","participantes":"10"}
  ]
  constructor() {

    for(let total of this.actividades){ 
      this.todo = total;
    }  
    this.text = this.todo;
  }
}
