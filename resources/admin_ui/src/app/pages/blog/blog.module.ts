import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BlogRoutingModule } from './blog-routing.module';
import { IndexComponent } from './index/index.component';
import { FormComponent } from './form/form.component';
import { EditComponent } from './edit/edit.component';
import { CreateComponent } from './create/create.component';



@NgModule({
  imports: [
    CommonModule,
    BlogRoutingModule
  ],
  declarations: [
    IndexComponent,
    FormComponent,
    EditComponent,
    CreateComponent
  ]
})
export class BlogModule { }
