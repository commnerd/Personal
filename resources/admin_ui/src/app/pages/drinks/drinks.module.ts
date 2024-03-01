import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DrinksRoutingModule } from "@pages/drinks/drinks-routing.module";
import { CreateComponent } from './create/create.component';
import { IndexComponent } from './index/index.component';
import { EditComponent } from './edit/edit.component';
import { FormComponent } from './form/form.component';
import {MatButtonModule} from "@angular/material/button";
import {MatIconModule} from "@angular/material/icon";


@NgModule({
  declarations: [
    CreateComponent,
    IndexComponent,
    EditComponent,
    FormComponent
  ],
  imports: [
    CommonModule,
    DrinksRoutingModule,
    MatButtonModule,
    MatIconModule
  ]
})
export class DrinksModule { }
