
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
  unique_array: any = [];
  user: any = [];
  a: any = [];
  text: any;
  myForm: FormGroup;
  Images = [
    'Playa',
    'Bar',
    'Restraurante',
    'Museo'
  ];
  imagenSeleccionada: any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public formBuilder: FormBuilder, public http: HttpClient) {
    this.res = navParams.data[1];
    this.myForm = this.createMyForm();
  }
  private createMyForm() {
    return this.formBuilder.group({
      Nombre: ['', Validators.required],
      Descripción: ['', Validators.required],
      total: ['', Validators.required],
      fecha: ['', Validators.required]

    });
  }

  ionViewDidLoad() {
    this.http.get('http://localhost:8000/User/').subscribe(
      res => {
        if (res) {
          this.text = res;
        }
      },
      err => {
        console.log("Error", err);
      }
    );
  }
  protected adjustTextarea(event: any): void {
    let textarea: any = event.target;
    textarea.style.overflow = 'hidden';
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
    return;
  }
  pickData() {
    this.http.get('http://localhost:8000/crearevento/?nombre=' + this.myForm.value.Nombre +
      '&descripcion=' + this.myForm.value.Descripción +
      '&fecha=' + this.myForm.value.fecha +
      '&url='+this.imagenSeleccionada +
      '&totalPrice=' + this.myForm.value.total +
      '&IdAdmin=' + this.res +
      '&allUSer=' + this.unique_array + " ").subscribe(
        res => {
          console.log(res);
        },
        err => {
          console.log(err);
        }

      );
  }
  push(id) {
    this.user.push(id);
    this.removeDuplicates(this.user);
    console.log(this.unique_array);
  }

  removeDuplicates(user) {
    for (let i = 0; i < user.length; i++) {
      if (this.unique_array.indexOf(user[i]) == -1) {
        this.unique_array.push(user[i]);
      }
    }
  }
  setImagen(e) {
    // this.imagenSeleccionada
    switch (e) {
      case 'Playa':
      this.imagenSeleccionada = "http://jsequeiros.com/sites/default/files/imagen-cachorro-comprimir.jpg";
        break;
      case 'Bar':
      this.imagenSeleccionada = "https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwizx6vT2avbAhWE6RQKHTV4AJsQjRx6BAgBEAU&url=http%3A%2F%2Fwww.cdn.com.do%2F2018%2F02%2F23%2Fplaya-dominicana-una-de-las-diez-mejores-del-mundo-segun-ranking-tripadvisor%2F&psig=AOvVaw1uaja7aiW2QLm2Fv7XQhr0&ust=1527710071132086+++-";
        break;
      case 'Restraurante':
      this.imagenSeleccionada = "https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwizx6vT2avbAhWE6RQKHTV4AJsQjRx6BAgBEAU&url=http%3A%2F%2Fwww.cdn.com.do%2F2018%2F02%2F23%2Fplaya-dominicana-una-de-las-diez-mejores-del-mundo-segun-ranking-tripadvisor%2F&psig=AOvVaw1uaja7aiW2QLm2Fv7XQhr0&ust=1527710071132086+++-";
        break;
      case 'Museo':
      this.imagenSeleccionada = "https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwizx6vT2avbAhWE6RQKHTV4AJsQjRx6BAgBEAU&url=http%3A%2F%2Fwww.cdn.com.do%2F2018%2F02%2F23%2Fplaya-dominicana-una-de-las-diez-mejores-del-mundo-segun-ranking-tripadvisor%2F&psig=AOvVaw1uaja7aiW2QLm2Fv7XQhr0&ust=1527710071132086+++-";
        break;
    }
  }
}
