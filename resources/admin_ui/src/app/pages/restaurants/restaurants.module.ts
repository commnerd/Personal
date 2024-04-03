import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RestaurantsRoutingModule } from "@pages/restaurants/restaurants-routing.module";
import { IndexComponent } from './index/index.component';
import { CreateComponent } from './create/create.component';
import { EditComponent } from './edit/edit.component';
import { FormComponent } from './form/form.component';
import { MatButtonModule } from "@angular/material/button";
import { MatIconModule } from "@angular/material/icon";
import { MatPaginatorModule } from "@angular/material/paginator";

@NgModule({
  declarations: [
    IndexComponent,
    CreateComponent,
    EditComponent,
    FormComponent
  ],
  imports: [
    CommonModule,
    RestaurantsRoutingModule,
    MatButtonModule,
    MatIconModule,
    MatPaginatorModule
  ]
})
export class RestaurantsModule { }
