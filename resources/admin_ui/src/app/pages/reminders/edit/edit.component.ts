import { Component, OnInit } from '@angular/core';
import { Reminder } from '@/interfaces/reminder';
import { Observable } from 'rxjs';
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
    let paramSubscriber = this.route.params.subscribe(params => {
      this.reminder$ = this.quoteService.get(params['id'] as number);
      setTimeout(() => paramSubscriber.unsubscribe(), 0);
    });
  }
}
