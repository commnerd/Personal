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

@NgModule({
    imports: [
      CommonModule,
      BlogRoutingModule,
      MatButtonModule,
      MatIconModule,
      MatPaginatorModule,
      PartialsModule
    ],
  declarations: [
    IndexComponent,
    FormComponent,
    EditComponent,
    CreateComponent
  ]
})
export class BlogModule { }
