import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { EditorModule, TINYMCE_SCRIPT_SRC } from '@tinymce/tinymce-angular';

import { BlogComponent } from './blog.component';
import { IndexComponent } from './index/index.component';
import { CreateComponent } from './create/create.component';
import { FormComponent } from './form/form.component';

import { BlogRoutingModule } from './blog-routing.module';


@NgModule({
  declarations: [
    BlogComponent,
    IndexComponent,
    CreateComponent,
    FormComponent
  ],
  imports: [
    CommonModule,
    EditorModule,
    BlogRoutingModule
  ],
  providers: [
    { provide: TINYMCE_SCRIPT_SRC, useValue: 'tinymce/tinymce.min.js' }
  ]
})
export class BlogModule { }
