import { TestBed } from '@angular/core/testing';

// Http testing module and mocking controller
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
import { HttpClient } from '@angular/common/http';
import { TestDataPaginator } from '../../../testing/TestDataPaginator';

import { ReminderService } from './reminder.service';
import { Reminder } from '@interfaces/reminder';

describe('ReminderService', () => {
  let service: ReminderService;
  let httpClient: HttpClient;
  let httpTestingController: HttpTestingController;
  const testReminders: Array<Reminder> = [
    {
      id: 1,
      reminder: 'Test Reminder',
      reference: 'Test Reference',
    },
    {
      id: 2,
      reminder: 'Another Test Reminder',
      reference: 'Another Test Reference',
    }
  ];

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule ]
    });

    service = TestBed.inject(ReminderService);
    // Inject the http service and test controller for each test
    httpClient = TestBed.inject(HttpClient);
    httpTestingController = TestBed.inject(HttpTestingController);
  });

  afterEach(() => {
    // After every test, assert that there are no more pending requests.
    httpTestingController.verify();
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });

  it('should list quotes', () => {
    const paginatedResponse = new TestDataPaginator(testReminders).get();

    service.list().subscribe(data =>
      expect(data).toEqual(paginatedResponse)
    );

    const req = httpTestingController.expectOne('/api/daily-reminders?page=1');

    expect(req.request.method).toEqual('GET');

    req.flush(paginatedResponse);
  });

  it('should get a drink', () => {
    const response = testReminders[1];

    service.get(2).subscribe(data => expect(data).toEqual(testReminders[1]));

    const req = httpTestingController.expectOne('/api/daily-reminders/2');

    expect(req.request.method).toEqual('GET');

    req.flush(testReminders[1]);
  });

  it('should create a drink on save', () => {
    const testReminderPreSave: Reminder = {
      reminder: 'A third reminder',
      reference: 'Reference 3',
    };
    const testReminderPostSave = {
      id: 3,
      reminder: 'A third reminder',
      reference: 'Reference 3',
      created_at: 'now',
      edited_at: 'now',
    };

    service.save(testReminderPreSave)
      .subscribe(data => expect(data).toEqual(testReminderPostSave));

    const req = httpTestingController.expectOne('/api/daily-reminders');

    expect(req.request.method).toEqual('POST');

    req.flush(testReminderPostSave);
  });

  it('should update a quote on save', () => {
    const testReminder = {
      id: 3,
      reminder: 'A third reminder',
      reference: 'Reference 3',
      created_at: 'now',
      edited_at: 'now',
    };

    httpClient.put<Reminder>('/api/daily-reminders/3', testReminder)
      .subscribe(data => expect(data).toEqual(testReminder));

    const req = httpTestingController.expectOne('/api/daily-reminders/3');

    expect(req.request.method).toEqual('PUT');

    req.flush(testReminder);
  });

});
