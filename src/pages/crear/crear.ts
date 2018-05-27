import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
/**
 * Generated class for the CrearPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()

@Component({
  selector: 'page-crear',
  templateUrl: 'crear.html',
  
})
export class CrearPage {
  res: any;
  myForm: FormGroup;
  constructor(public navCtrl: NavController, public navParams: NavParams,public formBuilder: FormBuilder,public http: HttpClient) {
    this.res = navParams.data[1];
    this.myForm = this.createMyForm();
  }
  private createMyForm(){
    return this.formBuilder.group({
      Nombre: ['', Validators.required],
      Descripción: ['', Validators.required],
      total: ['', Validators.required],
      fecha: ['', Validators.required]

    });
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad CrearPage');
  }
  protected adjustTextarea(event: any): void {
    let textarea: any		= event.target;
    textarea.style.overflow = 'hidden';
    textarea.style.height 	= 'auto';
    textarea.style.height 	= textarea.scrollHeight + 'px';
    return;
  }
  pickData(){
    this.http.post('http://localhost:8000/crearevento/?admin='+this.res+'&nombre='+
          this.myForm.value.Nombre,"&descripcion="+this.myForm.value.Descripción+'&fecha='
         +this.myForm.value.fecha+"")
  }
}
