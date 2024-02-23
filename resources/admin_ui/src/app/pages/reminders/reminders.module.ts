import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RemindersComponent } from './reminders.component';
import { RemindersRoutingModule } from "@pages/reminders/reminders-routing.module";



@NgModule({
  declarations: [
    RemindersComponent
  ],
  imports: [
    CommonModule,
    RemindersRoutingModule
  ]
})
export class RemindersModule { }
