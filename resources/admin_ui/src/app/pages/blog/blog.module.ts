import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BlogRoutingModule } from './blog-routing.module';
import { IndexComponent } from './index/index.component';
import { FormComponent } from './form/form.component';
import { EditComponent } from './edit/edit.component';
import { CreateComponent } from './create/create.component';
import {MatButtonModule} from "@angular/material/button";
import {MatIconModule} from "@angular/material/icon";
import {MatPaginatorModule} from "@angular/material/paginator";
import {PartialsModule} from "@partials/partials.module";
import {AngularEditorModule} from "@kolkov/angular-editor";
import {FormsModule, ReactiveFormsModule} from "@angular/forms";
import {MatFormFieldModule} from "@angular/material/form-field";
import {MatInputModule} from "@angular/material/input";
import {MatSlideToggleModule} from "@angular/material/slide-toggle";

@NgModule({
  imports: [
    CommonModule,
    BlogRoutingModule,
    MatButtonModule,
    MatIconModule,
    MatPaginatorModule,
    PartialsModule,
    AngularEditorModule,
    FormsModule,
    MatFormFieldModule,
    MatInputModule,
    MatSlideToggleModule,
    ReactiveFormsModule
  ],
  declarations: [
    IndexComponent,
    FormComponent,
    EditComponent,
    CreateComponent
  ]
})
export class BlogModule { }
