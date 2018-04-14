import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { LoginPage } from '../login/login';
import { AlertController } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MenuPage } from '../menu/menu';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  myForm: FormGroup;
  constructor(
    public navCtrl: NavController,
    public formBuilder: FormBuilder,
    private alertCtrl: AlertController
  ) {
    this.myForm = this.createMyForm();
  }
  
  private createMyForm(){
    return this.formBuilder.group({
      name: ['', Validators.required],
      lastName: ['', Validators.required],
      email: ['', Validators.required],
      passwordRetry: this.formBuilder.group({
        password: ['', Validators.required],
        passwordConfirmation: ['', Validators.required]
      })
    });
  }
  saveData(){
    if(this.myForm.value.passwordRetry.password === this.myForm.value.passwordRetry.passwordConfirmation){
      this.navCtrl.push(MenuPage);
    }else{
      let alert = this.alertCtrl.create({
        title: 'Wrong password',
        subTitle: 'Please retry the login and try again',
        buttons: ['Retry']
      });
      alert.present();
    }

  }
  send() {
    this.navCtrl.push(LoginPage);
  }
}
