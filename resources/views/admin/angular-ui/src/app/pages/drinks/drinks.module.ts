import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { DrinksComponent } from './drinks.component';
import { DrinksService } from '@services/api/drinks.service';
import { DrinksRoutingModule } from './drinks-routing.module';



@NgModule({
  declarations: [
    DrinksComponent
  ],
  imports: [
    CommonModule,
    DrinksRoutingModule
  ],
  providers: [
    DrinksService
  ]
})
export class DrinksModule { }

