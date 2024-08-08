import { Component, OnInit } from '@angular/core';
import { Reminder } from '@interfaces/reminder';
import {first, Observable} from 'rxjs';
import { ReminderService } from '@services/models/reminder.service';
import { ActivatedRoute } from '@angular/router';
@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {
  reminder$!: Observable<Reminder | null>;

  constructor(
    private quoteService: ReminderService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    this.route.params.pipe(first()).subscribe(params => {
      this.reminder$ = this.quoteService.get(params['id'] as number);
    });
  }
}
