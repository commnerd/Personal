import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IndexComponent } from './index.component';
import { QuoteService } from '../../../services/models/quote.service';
import { MatIconModule } from '@angular/material/icon';
import { of } from 'rxjs';
import { TestDataPaginator } from '../../../../testing/TestDataPaginator';
import { HttpClient, HttpHandler } from '@angular/common/http';

describe('IndexComponent', () => {
  let component: IndexComponent;
  let fixture: ComponentFixture<IndexComponent>;
  let quoteService: QuoteService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [MatIconModule],
      providers: [QuoteService, HttpClient, HttpHandler],
      declarations: [IndexComponent]
    });
    fixture = TestBed.createComponent(IndexComponent);
    component = fixture.componentInstance;
    quoteService = TestBed.inject(QuoteService);
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should print "No quotes found." on empty paged response', () => {
    quoteService.list = () => of((new TestDataPaginator([])).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(fixture.nativeElement.querySelector('table').textContent).toEqual("No quotes found.");
  });

  it('should print the quote information as passed in', () => {
    let data = [{
      id: 1,
      quote: "A quote",
      source: "Some Ref",
      active: false,
    }, {
      id: 2,
      quote: "Another quote",
      source: "Another Ref",
      active: true,
    }];
    quoteService.list = () => of((new TestDataPaginator(data)).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    let content = fixture.nativeElement.querySelector('table').textContent;
    expect(content).toContain("A quote");
    expect(content).toContain("Some Ref");
    expect(content).toContain("Another quote");
    expect(content).toContain("Another Ref");
  });
});
