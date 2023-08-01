import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IndexComponent } from './index/index.component';
import { PagesRoutingModule } from './pages-routing.module';
import { PartialsModule } from '../partials/partials.module';
import { DrinksModule } from './drinks/drinks.module';

@NgModule({
  declarations: [
    IndexComponent
  ],
  imports: [
    CommonModule,
    PagesRoutingModule,
    PartialsModule,
    DrinksModule
  ]
})
export class PagesModule { }
