import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { DrinksComponent } from './drinks.component';
import { DrinksService } from '@services/api/drinks.service';
import { DrinksRoutingModule } from './drinks-routing.module';
import { IndexComponent } from './index/index.component';

@NgModule({
  declarations: [
    DrinksComponent,
    IndexComponent
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

