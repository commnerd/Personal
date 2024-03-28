import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RemindersComponent } from './reminders.component';
import { RemindersRoutingModule } from "@pages/reminders/reminders-routing.module";
import { IndexComponent } from './index/index.component';
import { FormComponent } from './form/form.component';
import { EditComponent } from './edit/edit.component';
import { CreateComponent } from './create/create.component';



@NgModule({
  declarations: [
    RemindersComponent,
    IndexComponent,
    FormComponent,
    EditComponent,
    CreateComponent
  ],
  imports: [
    CommonModule,
    RemindersRoutingModule
  ]
})
export class RemindersModule { }
