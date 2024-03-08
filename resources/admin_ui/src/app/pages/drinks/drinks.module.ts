import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AngularEditorModule } from "@kolkov/angular-editor";
import { DrinksRoutingModule } from "@pages/drinks/drinks-routing.module";
import { CreateComponent } from './create/create.component';
import { IndexComponent } from './index/index.component';
import { EditComponent } from './edit/edit.component';
import { FormComponent } from './form/form.component';
import { MatButtonModule } from "@angular/material/button";
import { MatFormFieldModule } from "@angular/material/form-field";
import { MatIconModule } from "@angular/material/icon";
import { MatInputModule } from "@angular/material/input";
import { MatPaginatorModule } from '@angular/material/paginator';
import { ReactiveFormsModule } from "@angular/forms";
import { MatSlideToggleModule } from "@angular/material/slide-toggle";
import { PartialsModule } from "@partials/partials.module";


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
    MatIconModule,
    MatFormFieldModule,
    MatButtonModule,
    MatInputModule,
    MatPaginatorModule,
    ReactiveFormsModule,
    AngularEditorModule,
    MatSlideToggleModule,
    PartialsModule
  ]
})
export class DrinksModule { }
