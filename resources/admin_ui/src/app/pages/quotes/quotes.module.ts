import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IndexComponent } from './index/index.component';
import { MatIconModule } from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';
import { CreateComponent } from './create/create.component';
import { EditComponent } from './edit/edit.component';
import { FormComponent } from './form/form.component';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { ReactiveFormsModule } from '@angular/forms';
import { QuotesRoutingModule } from './quotes-routing.module';
import { AngularEditorModule } from '@kolkov/angular-editor';


@NgModule({
  declarations: [
    IndexComponent,
    CreateComponent,
    EditComponent,
    FormComponent
  ],
  imports: [
    CommonModule,
    QuotesRoutingModule,
    MatFormFieldModule,
    MatButtonModule,
    MatIconModule,
    MatInputModule,
    ReactiveFormsModule,
    AngularEditorModule
  ],
})
export class QuotesModule { }
