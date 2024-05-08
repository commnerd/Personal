import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ResumeRoutingModule } from "@pages/resume/resume-routing.module";
import { IndexComponent } from './index/index.component';
import { EditComponent } from './edit/edit.component';
import { FormComponent } from './form/form.component';
import { CreateComponent } from './create/create.component';
import {MatButtonModule} from "@angular/material/button";
import {MatIconModule} from "@angular/material/icon";
import {MatPaginatorModule} from "@angular/material/paginator";



@NgModule({
  declarations: [
    IndexComponent,
    EditComponent,
    FormComponent,
    CreateComponent
  ],
  imports: [
    CommonModule,
    ResumeRoutingModule,
    MatButtonModule,
    MatIconModule,
    MatPaginatorModule
  ]
})
export class ResumeModule { }
