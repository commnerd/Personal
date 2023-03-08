import { TestBed } from '@angular/core/testing';

import { ContactMessagesService } from './contact-messages.service';

describe('ContactMessagesService', () => {
  let service: ContactMessagesService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ContactMessagesService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
