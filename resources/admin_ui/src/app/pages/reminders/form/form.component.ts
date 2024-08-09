import { Component, Input, OnChanges, OnInit, SimpleChanges } from '@angular/core';
import { Reminder } from '@interfaces/reminder';
import { ReminderService } from '@services/models/reminder.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Location } from "@angular/common";
import { first } from "rxjs";

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit, OnChanges {

  @Input() reminder!: Reminder | null;
  reminderForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private reminderService: ReminderService,
    private location: Location
  ) {}

  ngOnInit(): void {
    this.reminder = {
      reminder: '',
      reference: ''
    };
    this.reminderForm = this.formBuilder.group(this.reminder!);
  }

  ngOnChanges(changes: SimpleChanges): void
  {
    if(this.reminder) {
      this.reminderForm.setValue({
        reference: changes['reminder']?.currentValue.reference,
        reminder: changes['reminder']?.currentValue.reminder
      });
    }
  }

  onSubmit() {
    this.reminderService.save(Object.assign(this.reminder!, this.reminderForm.value)).pipe(first()).subscribe( (rs) => {
      this.location.back();
    });
  }
}
