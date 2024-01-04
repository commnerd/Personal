import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MatButtonModule } from '@angular/material/button';
import { MatDialogModule } from '@angular/material/dialog';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatIconModule } from '@angular/material/icon';
import { MatInputModule } from '@angular/material/input';
import { MatSlideToggleModule } from "@angular/material/slide-toggle";
import { ReactiveFormsModule } from '@angular/forms';

import { AngularEditorModule } from '@kolkov/angular-editor';

import { CreateComponent } from './create/create.component';
import { EditComponent } from './edit/edit.component';
import { FormComponent } from './form/form.component';
import { IndexComponent } from './index/index.component';
import { QuotesRoutingModule } from './quotes-routing.module';
import { DeleteConfirmationDialogComponent } from './index/delete-confirmation-dialog/delete-confirmation-dialog.component';


@NgModule({
  declarations: [
    IndexComponent,
    CreateComponent,
    EditComponent,
    FormComponent,
    DeleteConfirmationDialogComponent
  ],
  imports: [
    CommonModule,
    QuotesRoutingModule,
    MatDialogModule,
    MatFormFieldModule,
    MatButtonModule,
    MatIconModule,
    MatInputModule,
    ReactiveFormsModule,
    AngularEditorModule,
    MatSlideToggleModule,
  ],
})
export class QuotesModule { }
