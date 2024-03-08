import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MatButtonModule } from '@angular/material/button';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatIconModule } from '@angular/material/icon';
import { MatInputModule } from '@angular/material/input';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatSlideToggleModule } from "@angular/material/slide-toggle";
import { ReactiveFormsModule } from '@angular/forms';

import { AngularEditorModule } from '@kolkov/angular-editor';

import { CreateComponent } from './create/create.component';
import { EditComponent } from './edit/edit.component';
import { FormComponent } from './form/form.component';
import { IndexComponent } from './index/index.component';
import { QuotesRoutingModule } from './quotes-routing.module';
import { PartialsModule } from "@partials/partials.module";


@NgModule({
  declarations: [
    IndexComponent,
    CreateComponent,
    EditComponent,
    FormComponent,
  ],
  imports: [
    CommonModule,
    QuotesRoutingModule,
    MatFormFieldModule,
    MatButtonModule,
    MatIconModule,
    MatInputModule,
    MatPaginatorModule,
    ReactiveFormsModule,
    AngularEditorModule,
    MatSlideToggleModule,
    PartialsModule
  ],
})
export class QuotesModule { }
