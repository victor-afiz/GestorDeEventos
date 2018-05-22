import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { AlertController } from 'ionic-angular';
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
  myForm: FormGroup;
  
  constructor(public navCtrl: NavController,
              public formBuilder: FormBuilder, 
              public navParams: NavParams,
              public http: HttpClient, 
              private alertCtrl: AlertController) {
                
      this.myForm = this.createMyForm();
                
  }
  private createMyForm() {
    return this.formBuilder.group({
      name: ['', Validators.required],
      descripcion: ['', Validators.required],
      precio: ['', Validators.required],
      date: ['', Validators.required]
      });
  }

  ionViewDidLoad() 
  {
    console.log('ionViewDidLoad CrearPage');
  }
  protected adjustTextarea(event: any): void 
  {
    let textarea: any		= event.target;
    textarea.style.overflow = 'hidden';
    textarea.style.height 	= 'auto';
    textarea.style.height 	= textarea.scrollHeight + 'px';
    return;
  }

  pickData()
  {
    this.http.post('http://localhost:8000/creareventos/?name='+
      this.myForm.value.name+'&descripcion='+
      this.myForm.value.descripcion+'&precio='+
      this.myForm.value.precio+'&date='+
      this.myForm.value.date,"")
  }

}
