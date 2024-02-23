import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RestaurantsComponent } from './restaurants.component';
import { RestaurantsRoutingModule } from "@pages/restaurants/restaurants-routing.module";



@NgModule({
  declarations: [
    RestaurantsComponent
  ],
  imports: [
    CommonModule,
    RestaurantsRoutingModule
  ]
})
export class RestaurantsModule { }
