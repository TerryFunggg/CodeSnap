require 'minitest/autorun'
require_relative './linked_list'

describe :LinkedList do
  describe '#init' do
    it 'init a tree' do
      list = LinkedList.new
    end
  end

  describe '#add' do
    it 'can add nodes' do
      list = LinkedList.new
      list.add(20)
      list.add(30)
      list.add(1)
      list.add(23)

      list.to_s.must_equal "20 30 1 23"
    end


    it 'can add to head' do
      list = LinkedList.new
      list.add(20)
      list.add(30)
      list.add_to_head(100)
      list.add_to_head(211)
      list.add(50)

      list.to_s.must_equal "211 100 20 30 50"
    end
  end

  describe '#remove' do
    it 'can remove nodes' do
      list = LinkedList.new
      list.add(20)
      list.add(30)
      list.add(1)
      list.add(23)
      list.remove
      list.remove

      list.to_s.must_equal "20 30"
    end


    it 'can remove head' do
      list = LinkedList.new
      list.add(20)
      list.add(30)
      list.remove_head
      list.remove_head
      list.add(50)

      list.to_s.must_equal "50"
    end
  end
end
