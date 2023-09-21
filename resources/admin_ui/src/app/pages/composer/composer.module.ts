import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IndexComponent } from './index/index.component';
import { ComposerRoutingModule } from './composer-routing.module';
import { MatIconModule } from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';
import { CreateComponent } from './create/create.component';
import { EditComponent } from './edit/edit.component';
import { FormComponent } from './form/form.component';


@NgModule({
  declarations: [
    IndexComponent,
    CreateComponent,
    EditComponent,
    FormComponent
  ],
  imports: [
    CommonModule,
    ComposerRoutingModule,
    MatButtonModule,
    MatIconModule
  ],
})
export class ComposerModule { }
