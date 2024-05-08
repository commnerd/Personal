import { TestBed } from '@angular/core/testing';

// Http testing module and mocking controller
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
import { TestDataPaginator } from '../../../testing/TestDataPaginator';

import { ContactMessageService } from './contact-message.service';
import { ContactMessage } from '@interfaces/contact-message';

describe('ContactMessageService', () => {
  let service: ContactMessageService;
  let httpTestingController: HttpTestingController;
  const testMessages: Array<ContactMessage> = [
    {
      id: 1,
      name: 'A message',
      email_phone: 'test@test.com',
      message: 'Some Message',
    },
    {
      id: 2,
      name: 'Another message',
      email_phone: 'test2@test.com',
      message: 'Some other message',
    }
  ];

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule ]
    });

    service = TestBed.inject(ContactMessageService);
    // Inject the http service and test controller for each test
    httpTestingController = TestBed.inject(HttpTestingController);
  });

  afterEach(() => {
    // After every test, assert that there are no more pending requests.
    httpTestingController.verify();
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });

  it('should list messages', () => {
    const paginatedResponse = new TestDataPaginator(testMessages).get();

    service.list().subscribe(data =>
      expect(data).toEqual(paginatedResponse)
    );

    const req = httpTestingController.expectOne('/api/contact-messages?page=1');

    expect(req.request.method).toEqual('GET');

    req.flush(paginatedResponse);
  });

  it('should get a message', () => {
    const response = testMessages[1];

    service.get(2).subscribe(data => expect(data).toEqual(testMessages[1]));

    const req = httpTestingController.expectOne('/api/contact-messages/2');

    expect(req.request.method).toEqual('GET');

    req.flush(testMessages[1]);
  });

});
