import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Reminder } from '@interfaces/reminder';
import { LaravelModelService } from "./laravel_model.service";

@Injectable({
  providedIn: 'root'
})
export class ReminderService extends LaravelModelService<Reminder> {

  protected path = '/api/daily-reminders';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
