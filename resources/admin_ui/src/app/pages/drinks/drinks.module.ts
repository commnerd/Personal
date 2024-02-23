import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DrinksComponent } from './drinks.component';
import { DrinksRoutingModule } from "@pages/drinks/drinks-routing.module";


@NgModule({
  declarations: [
    DrinksComponent
  ],
  imports: [
    CommonModule,
    DrinksRoutingModule
  ]
})
export class DrinksModule { }
