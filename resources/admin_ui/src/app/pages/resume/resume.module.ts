import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ResumeComponent } from './resume.component';
import { ResumeRoutingModule } from "@pages/resume/resume-routing.module";



@NgModule({
  declarations: [
    ResumeComponent
  ],
  imports: [
    CommonModule,
    ResumeRoutingModule
  ]
})
export class ResumeModule { }
