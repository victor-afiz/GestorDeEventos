import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { LoginPage } from '../login/login';
  import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  myForm: FormGroup;
  constructor(
    public navCtrl: NavController,
    public formBuilder: FormBuilder
  ) {
    this.myForm = this.createMyForm();
  }
  // private createMyForm(){
  //   return this.formBuilder.group({
  //     name: ['', Validators.required],
  //     surName: ['', Validators.required],
  //     email: ['', Validators.required],
  //     nickName: ['', Validators.required],
  //     passwordRetry: this.formBuilder.group({
  //       password: ['', Validators.required],
  //       passwordConfirmation: ['', Validators.required]
  //     })
  //   });
  // }
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
    console.log(this.myForm.value);
  }
  send() {
    this.navCtrl.push(LoginPage);
  }
}
