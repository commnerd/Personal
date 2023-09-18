import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ComposerComponent } from './composer.component';
import { ComposerRoutingModule } from './composer-routing.module';


@NgModule({
  imports: [
    CommonModule,
    ComposerRoutingModule,
  ]
})
export class ComposerModule { }
