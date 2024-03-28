import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MatButtonModule } from '@angular/material/button';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatIconModule } from '@angular/material/icon';
import { MatInputModule } from '@angular/material/input';
import { MatPaginatorModule } from '@angular/material/paginator';
import { ReactiveFormsModule } from '@angular/forms';
import { MatDialogModule } from '@angular/material/dialog';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { AngularEditorModule } from '@kolkov/angular-editor';

import { RemindersRoutingModule } from "@pages/reminders/reminders-routing.module";
import { IndexComponent } from './index/index.component';
import { FormComponent } from './form/form.component';
import { EditComponent } from './edit/edit.component';
import { CreateComponent } from './create/create.component';

@NgModule({
  declarations: [
    IndexComponent,
    FormComponent,
    EditComponent,
    CreateComponent
  ],
  imports: [
    CommonModule,
    BrowserAnimationsModule,
    RemindersRoutingModule,
    ReactiveFormsModule,
    AngularEditorModule,
    MatInputModule,
    MatPaginatorModule,
    MatIconModule,
    MatFormFieldModule,
    MatButtonModule,
    MatDialogModule,
  ]
})
export class RemindersModule { }
