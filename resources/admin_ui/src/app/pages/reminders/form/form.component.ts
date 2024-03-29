import { Component, Input, OnChanges, OnInit, SimpleChanges } from '@angular/core';
import { Reminder } from '@interfaces/reminder';
import { ReminderService } from '@services/models/reminder.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

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
    private router: Router
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
    let subscriber = this.reminderService.save(Object.assign(this.reminder!, this.reminderForm.value)).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['reminders']);
    });
  }
}
