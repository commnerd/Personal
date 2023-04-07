import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { MatSelectModule } from '@angular/material/select';
import { MatRadioModule } from '@angular/material/radio';
import { MatCardModule } from '@angular/material/card';
import { ReactiveFormsModule } from '@angular/forms';

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
    BlogRoutingModule,
    MatInputModule,
    MatButtonModule,
    MatSelectModule,
    MatRadioModule,
    MatCardModule,
    ReactiveFormsModule
  ],
  providers: [
    
  ]
})
export class BlogModule { }
